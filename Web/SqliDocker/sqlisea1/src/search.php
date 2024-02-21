<?php
error_reporting(0);
function getInfo()
{
    $con = mysqli_connect("127.0.0.1", "root", "root", 'CSSEC');

    if ($_GET['id']) $member_id = $_GET['id'];
    else $member_id = 221101;

    $req = "select * from member where id=$member_id";
    $result = mysqli_query($con, $req);
    $row = mysqli_fetch_array($result);
    if ($row) return getHtml($row);
    else return getError($con);
}

function getHtml($row)
{
    $html = '<div class="col-md-5 mb-auto mt-auto p-5">';
    if (strpos($row['avatar_path'], 'png')) $html .= '<img src="' . $row['avatar_path'] . '" class="card-img" alt="">';
    else $html .= '<img src="assert/avatar/CSSEC_LOGO.png" class="card-img" alt="">';
    $html .= '</div>';
    $html .= '<div class="col-md-7 p-5">';
    $html .= '<div class="card-body">';
    $html .= ' <p class="text-white-50 mb-4 md-title">信息展示</p>';
    $html .= "<p class='text-info md-p'>ID：" . $row['id'] . "</p>";
    $html .= "<p class='text-info md-p'>Name：" . $row['name'] . "</p>";
    $html .= "<p class='text-info md-p'>Advantage：" . $row['advantage'] . "</p>";
    $html .= '</div>';
    $html .= '</div>';
    return $html;
}

function getError($con)
{
    $html = '<div class="col-md-5 mb-auto mt-auto p-5">';
    $html .= '<img src="assert/avatar/CSSEC_LOGO.png" class="card-img" alt="">';
    $html .= '</div>';
    $html .= '<div class="col-md-7 p-5">';
    $html .= '<div class="card-body">';
    $html .= ' <p class="text-white-50 mb-4 md-title">查询失败</p>';
    $html .= "<h5 class='text-danger'>" . mysqli_error($con) . "</h5>";
    $html .= '</div>';
    $html .= '</div>';
    return $html;
}
