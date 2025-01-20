document.addEventListener("DOMContentLoaded", function () {
  // ロード画面の取得
  const loadingDiv = document.getElementById("loading");

  // PHPの成功ステータスとエラーメッセージをdata属性から取得
  const success = loadingDiv.getAttribute("data-success") === 'true';
  const errorMessage = loadingDiv.getAttribute("data-error-message");

  // 結果に基づいて処理
  if (success) {
    setTimeout(() => {
      // 処理が成功した場合にリダイレクト
      window.location.href = "confirmation.php"; // 成功後の遷移先
    }, 2000); // 2秒後に遷移
  } else {
    setTimeout(() => {
      // エラーメッセージをアラート表示してフォームに戻る
      alert("エラーが発生しました: " + errorMessage);
      window.location.href = "form_page.php"; // エラー後に戻る先
    }, 2000);
  }
});