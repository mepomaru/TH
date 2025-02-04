/*
File : createSoloDevTbl.sql
Date : 2024/10/30
Author : S.Ohgami
個人製作
*/

/*---------------以下テーブル削除----------------------*/
DROP TABLE IF EXISTS USER;

DROP TABLE IF EXISTS subjective_qes;

DROP TABLE IF EXISTS subjective_ans;

DROP TABLE IF EXISTS objective_qes;

DROP TABLE IF EXISTS objective_ans;
/*---------------以下テーブル作成----------------------*/
CREATE TABLE user (
    account_id INT AUTO_INCREMENT, -- アカウントID
    uname VARCHAR(64), -- ユーザー名
    PRIMARY KEY (account_id) -- 主キー制約
);

-- CREATE TABLE subjective_qes (
--     memorable_event VARCHAR(512),
--     accomplishment VARCHAR(512),
--     lesson VARCHAR(512),
--     core_values VARCHAR(512),
--     compliment VARCHAR(512),
--     coping VARCHAR(512),
--     challenge_feelings VARCHAR(512),
--     ideal_self VARCHAR(512),
--     future_self VARCHAR(512),
--     contribution VARCHAR(512)
--);

CREATE TABLE subjective_ans (
    account_id INT,
    memorable_event VARCHAR(512),
    accomplishment VARCHAR(512),
    lesson VARCHAR(512),
    core_values VARCHAR(512),
    compliment VARCHAR(512),
    coping VARCHAR(512),
    challenge_feelings VARCHAR(512),
    ideal_self VARCHAR(512),
    future_self VARCHAR(512),
    contribution VARCHAR(512),
    FOREIGN KEY (account_id) REFERENCES user (account_id) ON DELETE CASCADE
);

-- CREATE TABLE objective_qes (
--     life_priority VARCHAR(512),
--     redo VARCHAR(512),
--     strength VARCHAR(512),
--     weakness VARCHAR(512),
--     growth VARCHAR(512),
--     relationship_value VARCHAR(512),
--     advice VARCHAR(512),
--     stress_management VARCHAR(512),
--     happiness VARCHAR(512),
--     adaptability VARCHAR(512)
-- );

CREATE TABLE objective_ans (
    account_id INT,
    life_priority VARCHAR(512),
    redo VARCHAR(512),
    strength VARCHAR(512),
    weakness VARCHAR(512),
    growth VARCHAR(512),
    relationship_value VARCHAR(512),
    advice VARCHAR(512),
    stress_management VARCHAR(512),
    happiness VARCHAR(512),
    adaptability VARCHAR(512),
    FOREIGN KEY (account_id) REFERENCES user (account_id) ON DELETE CASCADE
);

/*---------------------データ挿入---------------------------*/
-- INSERT INTO
--     subjective_qes (
--         memorable_event,
--         accomplishment,
--         lesson,
--         core_values,
--         compliment,
--         coping,
--         challenge_feelings,
--         ideal_self,
--         future_self,
--         contribution
--     )
-- VALUES (
--         'これまでの人生で、最も印象に残っている出来事は何ですか？その出来事から何を学びましたか？',
--         '何かを成し遂げた時、一番嬉しかったことは何ですか？その経験から、自分の強みだと気づいたことはありますか？',
--         '失敗した経験から学んだことで、最も大きかったことは何ですか？',
--         '過去の経験から、自分が大切にしている価値観は何だと気づきましたか？',
--         '周りからよく褒められることは何ですか？',
--         'ストレスを感じるとき、どのように対処しますか？',
--         '新しいことに挑戦する時、どんな気持ちになりますか？',
--         '理想の自分はどんな姿ですか？',
--         '5年後の自分はどうなっていたいですか？',
--         'どんな仕事や生き方で、社会に貢献したいですか？'
--     );

-- INSERT INTO
--     objective_qes (
--         life_priority,
--         redo,
--         strength,
--         weakness,
--         growth,
--         relationship_value,
--         advice,
--         stress_management,
--         happiness,
--         adaptability
--     )
-- VALUES (
--         'あなたにとって、人生で最も大切にしたいことは何ですか？',
--         'もし、人生をやり直せるなら、どんなことをしたいですか？',
--         'あなたが最も得意なことを一つ挙げ、その理由を具体的に説明してください。',
--         'あなたが最も苦手なことを一つ挙げ、その理由を具体的に説明してください。',
--         '過去に最も成長できた経験は何ですか？その経験から、何を学びましたか？',
--         '人間関係において、最も大切にしていることは何ですか？',
--         'もし、誰か人間関係で何か一つだけアドバイスできるとしたら、どんなことを言いますか？',
--         'ストレスを感じた時、どのように対処しますか？',
--         '幸せを感じる瞬間は、どのような時ですか？',
--         '変化に対して、あなたはどちらかと言えば積極的に対応する方ですか、それとも消極的な方ですか？'
--     );