function submitQuiz() {
    // Kullanıcı adını ve soyadını güvenli bir şekilde alalım
    const userNameInput = document.getElementById("userName");
    const userName = userNameInput ? userNameInput.value.trim() : "";

    // Soruların cevaplarını alalım
    const answers = {
        question1: document.getElementById("question1").value.toLowerCase(),
        question2: document.getElementById("question2").value.toLowerCase(),
        question3: document.getElementById("question3").value.toLowerCase(),
    };

    // Doğru cevapları tanımlayalım
    const correctAnswers = {
        question1: "hyper text markup language",
        question2: "cascading style sheets",
        question3: "scripting",
    };

    // Puanı hesaplayalım
    let score = 0;

    for (const question in answers) {
        if (answers[question] === correctAnswers[question]) {
            score++;
        }
    }

    // Puanı local storage'a kaydedelim
    localStorage.setItem("userName", userName);
    localStorage.setItem("quizScore", score);

    // Sonuçları kullanıcıya gösterelim
    alert(`Sayın ${userName}, sınavı tamamladınız. Puanınız: ${score}/3`);
}
