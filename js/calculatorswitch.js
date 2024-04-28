function changeOptions() {
    var selectBox = document.getElementById("find");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    var secondOptionLabel = document.getElementById("second-option-label");
    
    if (selectedValue === "final-exam") {
        secondOptionLabel.textContent = "Desired Grade:";
    } else if (selectedValue === "final-class") {
        secondOptionLabel.textContent = "Final Exam Grade:";
    }
}
