/*
File : createSoloDev.sql
Date : 2024/10/30
Author : S.Ohgami
個人製作
*/

-- ユーザー作成
DROP USER IF EXISTS scROOT;

CREATE USER scRoot IDENTIFIED WITH MYSQL_NATIVE_PASSWORD BY 'root';

-- データベース作成
DROP DATABASE IF EXISTS trueHue;

CREATE DATABASE trueHue;

-- データベース移動
use trueHue;

--権限付与
GRANT ALL PRIVILEGES ON trueHue.* TO 'scRoot' @'%';

-- テーブル作成
source createSoloDevTbl.sql;

-- テーブル確認
select * from user;

select * from subjective_qes;

select * from subjective_ans;

select * from objective_qes;

select * from objective_ans;