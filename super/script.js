// Simulate payment
document.getElementById("payBtn").addEventListener("click", function(){
  alert("Payment Successful!");
  document.getElementById("payment-section").style.display = "none";
  document.getElementById("payslip-section").style.display = "block";
});

// Print Pay Slip
function printPaySlip() {
  window.print();
}

// Show registration form
function showForm() {
  document.getElementById("payslip-section").style.display = "none";
  document.getElementById("form-section").style.display = "block";
}

// Print form
function printForm() {
  const formContent = document.getElementById("studentForm").outerHTML;
  const newWin = window.open("", "Print", "width=600,height=600");
  newWin.document.write("<html><body>" + formContent + "</body></html>");
  newWin.document.close();
  newWin.print();
}

// Download form as HTML
function downloadForm() {
  const formContent = document.getElementById("studentForm").outerHTML;
  const blob = new Blob([formContent], { type: "text/html" });
  const link = document.createElement("a");
  link.href = URL.createObjectURL(blob);
  link.download = "student_form.html";
  link.click();
}
