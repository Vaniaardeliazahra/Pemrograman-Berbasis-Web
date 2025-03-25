function deretfibonacci(n) {
    let fibonacci = [0, 1]; 
    for (let i = 2; i < n; i++) {
        fibonacci[i] = fibonacci[i - 1] + fibonacci[i - 2]; 
    }
    return fibonacci;
}

console.log(deretfibonacci(15));
alert(`Deret Fibonacci`);