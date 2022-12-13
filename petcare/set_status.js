
function setStatus(pEmail, status) {

    var baseurl = 'http://localhost/php_prog/381project-381proj/381'
    var data = {
        'pEmail': pEmail,
        'status': status,
    }

    var xmlhttp = new XMLHttpRequest()
    xmlhttp.addEventListener("load", displayResponse)

    function displayResponse() {
        if (xmlhttp.status == 200) {
            var result = JSON.parse(xmlhttp.responseText)[0]
            console.log(result)
            if (result.status == 'BAD') {
                window.alert(result.message)

            } else {
                window.alert(result.message)
                location.reload()

            }
        }
    }

    xmlhttp.open("POST", `${baseurl}/app/func/set_status.php`)
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
    xmlhttp.send(JSON.stringify(data))

}
