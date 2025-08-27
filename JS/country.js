$(document).ready(function(){

    const countrymodal = $("#countryDetailsModal"),
        addnewcountrybutton=$("#addnewcountry"),
        countryidfield = $("#CountryId"),
        countrynamefield = $("#CountryName"),
        savecountrybutton = $("#saveCountry"),
        notifications = $("#notifications"),
        closebutton = $("#closemodal")
        

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
 


})