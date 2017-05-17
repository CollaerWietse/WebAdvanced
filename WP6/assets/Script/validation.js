/**
 * Created by Wiets on 15/05/2017.
 */

function validateCustomerData() {
    var name = document.getElementById("name");
    var email = document.getElementById("email");
    var phone = document.getElementById("phone");
    var address = document.getElementById("address");
    var city = document.getElementById("city");

    var errors = document.getElementById("errors");

    if(name === "" || email === "" || phone === "" || address === "" || city === ""){
        alert("Alle velden moeten ingevuld worden");
    }
}