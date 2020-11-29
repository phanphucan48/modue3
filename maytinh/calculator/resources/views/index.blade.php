<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<style>

    html {
        font-size: 62.5%;
        box-sizing: border-box;
    }

    *,
    *::before,
    *::after {
        margin: 0;
        padding: 0;
        box-sizing: inherit;
    }

    .calculator {
        border: 1px solid #ccc;
        border-radius: 5px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 400px;
    }

    .calculator-screen {
        width: 100%;
        height: 80px;
        border: none;
        background-color: #252525;
        color: #fff;
        text-align: right;
        padding-right: 20px;
        padding-left: 10px;
        font-size: 4rem;
    }

    button {
        height: 60px;
        font-size: 2rem!important;
    }

    .equal-sign {
        height: 98%;
        grid-area: 2 / 4 / 6 / 5;
    }

    .calculator-keys {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 20px;
        padding: 20px;
    }
</style>


<body>

<div class="calculator card">

    <input type="text" class="calculator-screen z-depth-1" value="0" disabled />

    <div class="calculator-keys">


        <button type="button" class="operator btn btn-info" value="+">+</button>
        <button type="button" class="operator btn btn-info" value="-">-</button>
        <button type="button" class="operator btn btn-info" value="*">&times;</button>
        <button type="button" class="operator btn btn-info" value="/">&divide;</button>

        <button type="button" value="7" class="btn btn-light waves-effect">7</button>
        <button type="button" value="8" class="btn btn-light waves-effect">8</button>
        <button type="button" value="9" class="btn btn-light waves-effect">9</button>


        <button type="button" value="4" class="btn btn-light waves-effect">4</button>
        <button type="button" value="5" class="btn btn-light waves-effect">5</button>
        <button type="button" value="6" class="btn btn-light waves-effect">6</button>


        <button type="button" value="1" class="btn btn-light waves-effect">1</button>
        <button type="button" value="2" class="btn btn-light waves-effect">2</button>
        <button type="button" value="3" class="btn btn-light waves-effect">3</button>


        <button type="button" value="0" class="btn btn-light waves-effect">0</button>
        <button type="button" class="decimal function btn btn-secondary" value=".">.</button>
        <button type="button" class="all-clear function btn btn-danger btn-sm" value="all-clear">AC</button>

        <button type="button" class="equal-sign operator btn btn-default" value="=">=</button>

    </div>
</div>


<script>
    // const calculator = {
    //     displayValue: '0',
    //     firstOperand: null,
    //     waitingForSecondOperand: false,
    //     operator: null,
    // };
    //
    // function inputDigit(digit) {
    //     const { displayValue, waitingForSecondOperand } = calculator;
    //
    //     if (waitingForSecondOperand === true) {
    //         calculator.displayValue = digit;
    //         calculator.waitingForSecondOperand = false;
    //     } else {
    //         calculator.displayValue = displayValue === '0' ? digit : displayValue + digit;
    //     }
    // }
    //
    // function inputDecimal(dot) {
    //     // If the `displayValue` does not contain a decimal point
    //     if (!calculator.displayValue.includes(dot)) {
    //         // Append the decimal point
    //         calculator.displayValue += dot;
    //     }
    // }
    //
    // function handleOperator(nextOperator) {
    //     const { firstOperand, displayValue, operator } = calculator
    //     const inputValue = parseFloat(displayValue);
    //
    //     if (operator && calculator.waitingForSecondOperand)  {
    //         calculator.operator = nextOperator;
    //         return;
    //     }
    //
    //     if (firstOperand == null) {
    //         calculator.firstOperand = inputValue;
    //     } else if (operator) {
    //         const currentValue = firstOperand || 0;
    //         const result = performCalculation[operator](currentValue, inputValue);
    //
    //         calculator.displayValue = String(result);
    //         calculator.firstOperand = result;
    //     }
    //
    //     calculator.waitingForSecondOperand = true;
    //     calculator.operator = nextOperator;
    // }
    //
    // const performCalculation = {
    //     '/': (firstOperand, secondOperand) => firstOperand / secondOperand,
    //
    //     '*': (firstOperand, secondOperand) => firstOperand * secondOperand,
    //
    //     '+': (firstOperand, secondOperand) => firstOperand + secondOperand,
    //
    //     '-': (firstOperand, secondOperand) => firstOperand - secondOperand,
    //
    //     '=': (firstOperand, secondOperand) => secondOperand
    // };
    //
    // function resetCalculator() {
    //     calculator.displayValue = '0';
    //     calculator.firstOperand = null;
    //     calculator.waitingForSecondOperand = false;
    //     calculator.operator = null;
    // }
    //
    // function updateDisplay() {
    //     const display = document.querySelector('.calculator-screen');
    //     display.value = calculator.displayValue;
    // }
    //
    // updateDisplay();
    //
    // const keys = document.querySelector('.calculator-keys');
    // keys.addEventListener('click', (event) => {
    //     const { target } = event;
    //     if (!target.matches('button')) {
    //         return;
    //     }
    //
    //     if (target.classList.contains('operator')) {
    //         handleOperator(target.value);
    //         updateDisplay();
    //         return;
    //     }
    //
    //     if (target.classList.contains('decimal')) {
    //         inputDecimal(target.value);
    //         updateDisplay();
    //         return;
    //     }
    //
    //     if (target.classList.contains('all-clear')) {
    //         resetCalculator();
    //         updateDisplay();
    //         return;
    //     }
    //
    //     inputDigit(target.value);
    //     updateDisplay();
    // });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
