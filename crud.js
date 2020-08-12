function validateForm() {
    let flag = true
    let phone = document.getElementById("phone"),
        pin = document.getElementById("pin"), error = document.getElementById("error");
    if (phone.value !== "" && !phone.value.match(/^\d{10}$/)) {
        alert("Invalid Phone number");
        flag = false
    } else if (pin.value !== "" && !pin.value.match(/^\d{6}$/)) {
        alert("Invalid Pin Code");
        flag = false
    }
    return flag;
}

function post(path, params, method = 'post') {
    const form = document.createElement('form');
    form.method = method;
    form.action = path;

    for (const key in params) {
        if (params.hasOwnProperty(key)) {
            const hiddenField = document.createElement('input');
            hiddenField.type = 'hidden';
            hiddenField.name = key;
            hiddenField.value = params[key];

            form.appendChild(hiddenField);
        }
    }
    document.body.appendChild(form);
    form.submit();
}

let edit = document.getElementsByClassName("edit");
Array.from(edit).forEach(function (edit) {
    edit.addEventListener('click', function () {
        console.log('hi')
        let id = this.parentElement.attributes['data-id'].value,
            name = document.getElementById('name' + id),
            email = document.getElementById('email' + id),
            phone = document.getElementById('phone' + id),
            date = document.getElementById('date' + id),
            pin = document.getElementById('pin' + id);
        if (this.className === 'edit') {
            name.disabled = false;
            email.disabled = false;
            phone.disabled = false;
            date.disabled = false;
            pin.disabled = false;
            this.innerHTML = 'Save';
            this.className = 'save';
        } else if (this.className === 'save') {
            let data = {
                name: name.value, email: email.value, phone: phone.value,
                date: date.value, pin: pin.value, id: id
            }
            if (tableValidation(data)) {
                post('update.php', data)
            }
        }
    });
});

let deleteRow = document.getElementsByClassName("delete");
Array.from(deleteRow).forEach(function (deleteRow) {
    deleteRow.addEventListener('click', function () {
        let id = this.parentElement.attributes['data-id'].value;
        post('update.php', {id: id})
    });
});

function tableValidation(data) {
    let reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if (data['name'] === '') {
        alert("name cannot be empty")
        return false;
    } else if (data['email'] === '' || !reg.test(data['email'])) {
        alert("Email should be in proper form")
        return false;
    } else if (data['phone'] === '' || !data['phone'].match(/^\d{10}$/)) {
        console.log(data['phone'].match(/^\d{10}$/))
        alert("phone number should be in proper form")
        return false;
    } else if (data['pin'] === '' || !data['pin'].match(/^\d{6}$/)) {
        alert("pin code should be in proper form")
        return false;
    } else if (data['date'] === '') {
        alert("date of birth cannot be empty ")
        return false;
    } else {
        return true;
    }
}