/*
File : createSoloDevTbl.sql
Date : 2024/10/30
Author : S.Ohgami
個人製作
*/

/*---------------以下テーブル削除----------------------*/
DROP TABLE IF EXISTS USER;
/*---------------以下テーブル作成----------------------*/
CREATE TABLE user (
    account_id INT AUTO_INCREMENT, -- アカウントID
    uname VARCHAR(64), -- ユーザー名
    PRIMARY KEY (account_id) -- 主キー制約
);

CREATE TABLE questions (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    question_key VARCHAR(50) UNIQUE NOT NULL,  -- 質問の識別キー（例: memorable_event, strength）
    question_text TEXT NOT NULL,               -- 実際の質問文
    category ENUM('主観', '客観') NOT NULL,    -- 質問のタイプ（主観的 or 客観的）
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE answers (
    account_id INT PRIMARY KEY,
    core_values_ans VARCHAR(512),
    accomplishment_ans VARCHAR(512),
    lesson_ans VARCHAR(512),
    core_values_repeat_ans VARCHAR(512),
    compliment_ans VARCHAR(512),
    coping_ans VARCHAR(512),
    challenge_feelings_ans VARCHAR(512),
    ideal_self_ans VARCHAR(512),
    future_self_ans VARCHAR(512),
    contribution_ans VARCHAR(512),
    life_priority_ans VARCHAR(512),
    redo_ans VARCHAR(512),
    strength_ans VARCHAR(512),
    weakness_ans VARCHAR(512),
    growth_ans VARCHAR(512),
    relationship_value_ans VARCHAR(512),
    advice_ans VARCHAR(512),
    stress_management_ans VARCHAR(512),
    happiness_ans VARCHAR(512),
    adaptability_ans VARCHAR(512),
    FOREIGN KEY (account_id) REFERENCES user (account_id) ON DELETE CASCADE
);
/*---------------------データ挿入---------------------------*/
INSERT INTO questions (question_key, question_text, category) VALUES
-- 主観的質問
('memorable_event', 'これまでの人生で最も印象に残っている出来事は何ですか？', '主観'),
('accomplishment', '何かを成し遂げた時、一番嬉しかったことは何ですか？', '主観'),
('lesson', '失敗した経験から学んだことで、最も大きかったことは何ですか？', '主観'),
('core_values', '過去の経験から、自分が大切にしている価値観は何だと思いますか？', '主観'),
('compliment', 'あなたが周りからよく褒められることは何ですか？', '主観'),
('coping', 'あなたはストレスを感じるとき、どのように対処しますか？', '主観'),
('challenge_feelings', '新しいことに挑戦する時、どんな気持ちになりますか？', '主観'),
('ideal_self', 'あなたの理想の自分はどんな姿ですか？', '主観'),
('future_self', '5年後の自分はどうなっていたいですか？', '主観'),
('contribution', 'どんな仕事や生き方で、社会に貢献したいですか？', '主観'),
-- 客観的質問
('life_priority', 'あなたにとって、人生で最も大切にしたいことは何ですか？', '客観'),
('redo', 'もし、人生をやり直せるなら、どんなことをしたいですか？', '客観'),
('strength', 'あなたが最も得意なことを一つ挙げ、その理由を具体的に説明してください。', '客観'),
('weakness', 'あなたが最も苦手なことを一つ挙げ、その理由を具体的に説明してください。', '客観'),
('growth', '過去に最も成長できた経験は何ですか？その経験から、何を学びましたか？', '客観'),
('relationship_value', '人間関係において、最も大切にしていることは何ですか？', '客観'),
('advice', 'もし、誰かに人間関係で何か一つだけアドバイスできるとしたら、どんなことを言いますか？', '客観'),
('stress_management', 'ストレスを感じた時、どのように対処しますか？', '客観'),
('happiness', '幸せを感じる瞬間は、どのような時ですか？', '客観'),
('adaptability', '変化に対して、あなたはどちらかと言えば積極的に対応する方ですか、それとも消極的な方ですか？', '客観');
