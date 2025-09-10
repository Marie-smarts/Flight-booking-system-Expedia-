$(document).ready(function(){

    const countrymodal = $("#countryDetailsModal"),
        addnewcountrybutton=$("#addnewcountry"),
        countryidfield = $("#CountryId"),
        countrynamefield = $("#CountryName"),
        savecountrybutton = $("#saveCountry"),
        notifications = $("#notifications"),
        closebutton = $("#closemodal"),
        countriestable = $("#countrytable"),
        countrynotifications = $("#countrynotifications")
        
    //Load existing countries 
    getCountriesAsTable()

    addnewcountrybutton.on("click",function(){
        countrymodal.modal("show")
    })

    savecountrybutton.on("click", function(){

        const  CountryName = countrynamefield.val(),
               CountryId = countryidfield.val()

        if(CountryName==""){

            notifications.html("<div class='alert alert-primary' role='alert'>Please enter country name!!</div> ")
            countrynamefield.focus()

        }else{

            $.post(
                "Controllers/countryoperations.php",
                {
                    saveCountry:true,
                    CountryId,
                    CountryName
                },

                function(data){

                    if(isJSON(data)){

                        data = JSON.parse(data)
                        if(data.status == "success"){

                            notifications.html("<div class='alert alert-success' role='alert' >Country saved successfully.</div>")
                            countrynamefield.val("")
                            countrynamefield.focus()
                            //Refresh the countries table
                            getCountriesAsTable()
                            
 

                        }else if(data.status == "exists"){

                            notifications.html("<div class='alert alert-info ' role='alert'>Country already exists.</div>")
                            countrynamefield.focus()

                        }

                    }else{

                        notifications.html(`<div class='alert alert-danger' role='alert'> An error occured ${data} </div>`)

                    }

                }
            )
        }

    })

    countrynamefield.on("input",function(){

        notifications.html("")
    })

    closebutton.on("click",function(){

        countrymodal.modal("hide")
        
    })


    function isJSON(str){
        try{

            return(JSON.parse(str) && !!str)

        } catch (e){

            return false

        }
    }
 


    function getCountriesAsTable(){

        $.getJSON(
            "Controllers/countryoperations.php",
            {
                getCountry:true
            }
        ).done(function(data){

            let results = "";
            data.forEach(function(country,i){
                results += `<tr> <td>${i+1} </td>`
                results += `<td>${country.CountryName} </td>`
                results += `<td>${country.cities} </td>`
                results += `<td>${country.airports} </td>`
                results += `<td>${country.airlines} </td>`
                results += `<td><a href = "#"><i class= "fas fa-edit fa-lg"></i></a></td></tr>`
            })

            //Done with looping throught the data that is returned
            countriestable.find("tbody").html(results);

        }).fail(function(response,status,error){

            console.log(`Sorry an error occured ${response.responseText}`);
            countrynotifications.html(`<div class='alert alert-danger' role='alert'> An error occured ${response.responseText} </div>`)

        })
    }


})