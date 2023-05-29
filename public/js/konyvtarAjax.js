class MyAjax {
    constructor(token) {
        this.token = token;
    }

    /*GET - ADATOK LEKÉRÉSE*/
    //apiEndPoint: ahol megkapja a szervertől (ill. azon keresztül az adatbázistól) a (frissített ill. adott esetben szűrt) adatokat
    getAjax(apiEndPoint, array, myCallback) {
        array.splice(0, array.length); //tömb ürítése, hogy többszöri lefutáskor ne legyen hozzáfűzés
        $.ajax({
            url: apiEndPoint,
            type: "GET", //GET metódussal lekéri az adatokat az API végpontról, és egy result tömbbe teszi
            success: function (result) {
                result.forEach(function (element) {
                    array.push(element); //a result összes elemét beletöltjük egy tömbbe
                });                     
                myCallback(array); //ha a tömb már teljesen feltöltődött, átadható paraméterként egy függvénynek
            },
        });
        console.log("GET OK");
    }

    /*POST - új adat felvitele az AB-ba API végponton keresztül*/
    postAjax(apiEndPoint, newData) {
        newData._token = this.token;
        $.ajax({
            headers: { "X-CSRF-TOKEN": this.token },
            url: apiEndPoint,
            type: "POST",
            data: newData,
            success: function (result) {
                console.log("POST success");
            },            
        });
    

    }

    deleteAjax(apiEndPoint, id) {
        $.ajax({
            headers: { "X-CSRF-TOKEN": this.token },
            url: apiEndPoint + "/" + id,
            type: "DELETE",
            success: function (result) {
                console.log("DEL success");
            },            
        });
    }

    
}