var ajax = new XMLHttpRequest();

const ajaxRequest = (idInput, numberFile = "", nameValue) => {
    ajax.onreadystatechange = function () {
        if (ajax.readyState === 4) {
            if (ajax.status === 200) {
                console.dir(ajax.responseText);
                document.getElementById("response").innerHTML = ajax.response;
            }
        }
    }
    var blockValue = document.getElementById(idInput).value;
    ajax.open("get", `select${numberFile}.php?${nameValue}=` + blockValue);
    ajax.send();
}