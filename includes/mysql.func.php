<?php
/**
*2012-7-28   By:NaV!
*/
//防止恶意调用
if (!defined('IN_GM')) {
	exit('Access Defined!');
}
//数据库连接
//define('DB_HOST', 'localhost');  //地址
//define('DB_USER', 'root');       //用户名
//define('DB_PWD', '');            //密码
//define('DB_NAME', 'gmanage');    //数据库名
$mysqli = mysqli_connect(constant("DB_HOST"),constant("DB_USER"),constant("DB_PWD"));
/**
 * _connect 连接数据库
 */
function _connect(){
    global $mysqli;
    if(!$mysqli){
		exit('数据库连接失败！');
	}
}
/**
 * _select_db 选择数据库
 */
function _select_db(){
    global $mysqli;
	if(!mysqli_select_db($mysqli,DB_NAME)){
		exit('找不到数据库：'.DB_NAME);
	}
}
/**
 * _set_names 设置字符集
 */
function _set_names(){
    global $mysqli;
	if(!mysqli_query($mysqli,'set names utf8')){
		exit('设置字符集出现错误！');
	}
}
/**
 * _query mysqli_query执行结果
 * @access public
 * @param string $sql
 * @return 返回一个结果集
 */
function _query($sql){
    global $mysqli;
	return mysqli_query($mysqli,$sql);
}
/**
 * _fetch_array 和query结果集作用后的结果
 * @access public
 * @param string $sql
 * @return 返回执行结果数组
 */
function _fetch_array($sql){
	return mysqli_fetch_array(_query($sql));
}
/**
 * _fetch_array 单纯的mysqli_fetch_array执行结果
 * @access public
 * @param string $res 结果集
 * @return 返回执行结果数组
 */
function _fetch_array_list($res){
	return mysqli_fetch_array($res);
}
/**
 * _num_rows返回结果集包含的结果个数，参数为语句
 * @access public
 * @param $sql 数据库执行语句
 * @return 返回个数
 */
function _num_rows($sql){
	return 	mysqli_num_rows(_query($sql));	
}
/**
 * _num_rows_list返回结果集包含的结果个数，参数为结果集
 * Enter description here ...
 * @param $res
 */
function _num_rows_list($res){
	return 	mysqli_num_rows($res);	
}
/**
 * _is_repeat判断插入信息在数据库里是否重复
 * @access public
 */
function _is_repeat($sql,$info){
	if(_fetch_array($sql)){
		_alert_back($info);
	}
}














?>