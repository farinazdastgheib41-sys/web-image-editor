<?php
// تنظیمات سرور
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Web Image Editor - ویرایشگر تصویر</title>
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
    <div class="app-shell">
        <!-- TOOLBAR - ابزارها -->
        <aside class="toolbar">
            <div class="logo-box">🎨 Image Editor</div>

            <div class="tool-group">
                <h3 class="group-title">Brush Tools</h3>
                <button class="tool-btn active" data-tool="brush">✏️ Brush</button>
                <button class="tool-btn" data-tool="eraser">🗑️ Eraser</button>
                <button class="tool-btn" data-tool="clone">📋 Clone</button>
            </div>

            <div class="tool-group">
                <h3 class="group-title">Selection</h3>
                <button class="tool-btn" data-tool="rectangle">⬜ Rectangle</button>
                <button class="tool-btn" data-tool="lasso">🔗 Lasso</button>
                <button class="tool-btn" data-tool="magic">✨ Magic</button>
            </div>

            <div class="tool-group">
                <h3 class="group-title">Other</h3>
                <button class="tool-btn" data-tool="text">📝 Text</button>
                <button class="tool-btn" data-tool="crop">🔲 Crop</button>
                <button class="tool-btn" data-tool="bucket">🪣 Fill</button>
            </div>

            <div class="tool-group">
                <h3 class="group-title">Layers</h3>
                <button id="addLayerBtn" class="small-btn">+ Add Layer</button>
                <button id="deleteLayerBtn" class="small-btn danger">- Delete</button>
                <div id="layersList" class="layers-list"></div>
            </div>
        </aside>

        <!-- WORKSPACE - فضای کار -->
        <main class="workspace">
            <div class="topbar">
                <div class="topbar-group">
                    <label class="upload-btn">
                        <span>📂 Open Image</span>
                        <input type="file" id="imageInput" accept="image/*" style="display:none;" />
                    </label>
                </div>

                <div class="topbar-group">
                    <button id="undoBtn" class="small-btn" title="Undo">↶ Undo</button>
                    <button id="redoBtn" class="small-btn" title="Redo">↷ Redo</button>
                </div>

                <div class="topbar-group">
                    <button id="resetBtn" class="small-btn warning">🔄 Reset</button>
                    <button id="saveBtn" class="small-btn success">💾 Save PNG</button>
                </div>
            </div>

            <div class="canvas-container">
                <canvas id="editorCanvas" width="1200" height="600"></canvas>
                <canvas id="selectionCanvas" width="1200" height="600"></canvas>
            </div>
        </main>

        <!-- SIDEBAR - پنل کنترل -->
        <aside class="sidebar">
            <div class="sidebar-section">
                <h3>Brush Settings</h3>
                
                <div class="control-box">
                    <label>Size: <span id="sizeValue">18</span>px</label>
                    <input id="brushSize" type="range" min="1" max="100" value="18" />
                </div>

                <div class="control-box">
                    <label>Opacity: <span id="opacityValue">100</span>%</label>
                    <input id="opacity" type="range" min="0" max="100" value="100" />
                </div>

                <div class="control-box">
                    <label>Hardness</label>
                    <input id="hardness" type="range" min="0" max="100" value="75" />
                </div>
            </div>

            <div class="sidebar-section">
                <h3>Color</h3>
                <div class="control-box">
                    <input id="colorPicker" type="color" value="#000000" />
                    <input id="colorHex" type="text" value="#000000" maxlength="7" />
                </div>
                <div class="color-presets">
                    <div class="preset" style="background:#000000" data-color="#000000"></div>
                    <div class="preset" style="background:#FFFFFF" data-color="#FFFFFF"></div>
                    <div class="preset" style="background:#FF0000" data-color="#FF0000"></div>
                    <div class="preset" style="background:#00FF00" data-color="#00FF00"></div>
                    <div class="preset" style="background:#0000FF" data-color="#0000FF"></div>
                </div>
            </div>

            <div class="sidebar-section">
                <h3>Text</h3>
                <div class="control-box">
                    <label>Content</label>
                    <input type="text" id="textValue" value="HELLO" maxlength="50" />
                </div>
                <div class="control-box">
                    <label>Font Size: <span id="textSizeValue">32</span>px</label>
                    <input id="textSize" type="range" min="12" max="120" value="32" />
                </div>
            </div>

            <div class="sidebar-section">
                <h3>Filters</h3>
                <button class="filter-btn active" data-filter="none">Normal</button>
                <button class="filter-btn" data-filter="grayscale">Grayscale</button>
                <button class="filter-btn" data-filter="sepia">Sepia</button>
                <button class="filter-btn" data-filter="invert">Invert</button>
                <button class="filter-btn" data-filter="blur">Blur</button>
                <button class="filter-btn" data-filter="saturate">Saturate</button>
            </div>

            <div class="sidebar-section">
                <h3>Adjustments</h3>
                <div class="control-box">
                    <label>Brightness</label>
                    <input id="brightness" type="range" min="-100" max="100" value="0" />
                </div>
                <div class="control-box">
                    <label>Contrast</label>
                    <input id="contrast" type="range" min="-100" max="100" value="0" />
                </div>
            </div>
        </aside>
    </div>

    <script src="assets/js/app.js"></script>
</body>
</html>
