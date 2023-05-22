//doi tuong Validator
function Validator(options){

    //ham thuc hien validate
    function validate(inputElement, rule){
        var errorElement = inputElement.parentElement.querySelector(options.errorSelector);
        var errorMessage = rule.test(inputElement.value);
                    
        if (errorMessage){
            errorElement.innerText = errorMessage;
            inputElement.parentElement.classList.add('invalid');
        }
        else{
            errorElement.innerText = '';
            inputElement.parentElement.classList.remove('invalid');
        }
    }
    // lay element cua form can validate
    var formElement = document.querySelector(options.form);

    if(formElement){
        options.rules.forEach(function(rule){
            var inputElement = formElement.querySelector(rule.selector);
           
            if (inputElement){
                //xu ly trg hop blur khoi input
                inputElement.onblur = function (){
                    validate(inputElement, rule);
                }
                //xu ly moi khi ng dung nhap
                inputElement.oninput= function(){
                    var errorElement = inputElement.parentElement.querySelector('.form-message');
                    errorElement.innerText = '';
                    inputElement.parentElement.classList.remove('invalid');
                }
            }
        });
    }   

}

//Dinh nghia rule
// Nguyen tac. Loi => tra loi, hop le => ko tra ve
Validator.isRequired = function (selector,  message){
    return {
        selector: selector,
        test: function(value){
            return value.trim() ? undefined : message || 'Vui lòng nhập trường này'
        }
    }
}

Validator.isEmail = function (selector, message){
    return {
        selector: selector,
        test: function(value){
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined : message || 'Trường này phải là email';
        }
    }
}   

Validator.minLength = function (selector, min,  message){
    return {
        selector: selector,
        test: function(value){
            return value.length >= min ? undefined : message || `Vui lòng nhập tối thiểu ${min} ký tự`;
        }
    }
}

Validator.isConfirmed = function(selector, getCofirmValue, message){
    return {
        selector: selector,
        test: function (value){
            return value === getCofirmValue() ? undefined : message || 'Giá trị nhập vào không chính xác';
        }
    }
}