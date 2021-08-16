<?php
session_start();

if(!isset($_SESSION['User'])){
    header('Location: index.php');
    exit();
}
?>
<html>
<head>
    <title>File storage</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        h2{
            margin: 0;
        }
        h3{
            margin: 0;
        }
        table{
            margin: 15px;
        }
        #main{
            width: 900px;
            height: 550px;
        }
        #main-header{
            justify-content: space-between;
            margin: 15px
        }
        #files{
            height: 100%;
            display: flex;
            flex-direction: column;
            overflow: auto;
        }
        #upload{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #file{
            margin-right: 10px;
        }
        #submit-file{
            display: block;
        }
        #progress{
            display: none;
        }
        #response{
            text-align: center;
        }
        a.delete {display:inline-block;
            background: url('assets/images/delete.png') no-repeat scroll 0 2px;
            color:#d00;
            margin-left: 15px;
            font-size: 11px;
            padding: 0 0 0 13px;
            cursor: pointer;
            text-decoration: none;
        }
        a.download {
            background: url('assets/images/download.png') no-repeat scroll 0px 5px;
            padding: 4px 0 4px 20px;
            font-size: 11px;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div id="container">
        <div id="main">
            <div id="main-header">
                <h2>Files:</h2>
                <div>
                    <button class="btn error" onclick="window.location = 'authentication.php?function=logout'">Log out</button>
                    <button class="btn success" onclick="modalShow()">+ Add file</button>
                </div>
            </div>
            <i class="divider"></i>
            <div id="files">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 65%;">File</th>
                            <th style="width: 15%;">Size</th>
                            <th style="width: 20%;">Options</th>
                        </tr>
                    </thead>
                    <tbody id="file-list">
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Add file:</h3>
                    <span class="modal-close" onclick="modalClose()">&times;</span>
                </div>
                <i class="divider"></i>
                <div class="modal-body">
                    <form id="upload" enctype="multipart/form-data">
                        <input type="file" name="file" id="file">
                        <input type="submit" id="submit-file">
                        <div id="progress">
                            <p style="display: flex; align-items: center;">
                                <img src="assets/images/loading-ajax.gif" height="24px" style="margin-right: 10px;">
                                <span id="percentage">0%</span>
                            </p>
                        </div>
                    </form>
                    <div id="response"></div>
                </div>
            </div>
        </div>
        <div id="loading-ajax"></div>
    </div>
    <script src="assets/scripts/jquery-3.6.0.min.js"></script>
    <script src="assets/scripts/Modal.js"></script>
    <script src="assets/scripts/Files.js"></script>
</body>
</html>