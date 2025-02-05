document.getElementById('registerForm').addEventListener('submit', function (e) {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm_password').value;
    const errorDiv = document.getElementById('passwordError');

    // パスワードの要件をチェック（特殊記号は不要）
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;
    if (!passwordRegex.test(password)) {
        errorDiv.textContent = 'パスワードは8文字以上で、大文字、小文字、数字を含めてください。';
        e.preventDefault(); // フォームの送信を防止
        return;
    }

    // 確認用パスワードが一致するかチェック
    if (password !== confirmPassword) {
        errorDiv.textContent = 'パスワードが一致しません。';
        e.preventDefault(); // フォームの送信を防止
        return;
    }

    // 問題なし
    errorDiv.textContent = '';
});