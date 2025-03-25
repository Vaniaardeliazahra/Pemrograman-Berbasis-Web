const kalkulator = (operator, ...angka) => {
    let [a, b] = angka;
    switch (operator) {
        case '+': return a + b;
        case '-': return a - b;
        case '*': return a * b;
        case '/': return a / b;
        case '%': return a % b;
    }
};

let angka1 = Number(prompt("Masukkan angka pertama:"));
let operator = prompt("Masukkan operator (+, -, *, /, %):");
let angka2 = Number(prompt("Masukkan angka kedua:"));

alert(`${angka1} ${operator} ${angka2} = ${kalkulator(operator, angka1, angka2)}`);