$(document).ready(function(){

    const addNewBtn = $("#AddNewCity"),
            cityDetailsModal = $("#cityDetailsModal"),
            filterCountryList = $("#filtercountry"),
            filterCityName = $("#filtercityname"),
            searchCitiesBtn = $("#searchcities"),
            cityCountryList = $('#citydetailscountry'),
            filterCityNotifications = $('#filtercitynotifications'),
            cityTable = $("#citytable"),
            cityNameField = $('#citydetailscityname'),
            saveCityBtn  = $('#saveCity'),
            cityDetailNotifications= $('#citydetailsnotifications'),
            cityIdField = $('#cityid'),
            closeCityDetailsModalBtn = $('#closeCityDetailsModal')
            
            
        //global vairables
        inputfield = $('input'),
        selectfield= $('select')



    //load countries from the database
    getcountries(filterCountryList,'all')
    getcountries(cityCountryList,'choose')

    inputfield.on('input',function(){

        cityDetailNotifications.html('')
    })

    selectfield.on('change', function(){

        inputfield.trigger('input')

    })


    //Listen to new add city button click
    addNewBtn.on('click', function(){

        cityDetailsModal.modal('show')

    })


    function getcountries(obj,option='choose'){

        $.getJSON(
            'Controllers/countryoperations.php',
            {
                getCountry:true
            }
        ).done(function(data){

            let results = option == 'choose'? 
            `<option value=''>&lt;Choose&gt</option>`:
            `<option value='0'>&lt;All&gt;</option>`
            data.forEach(function(country){
                results += `<option value='${country.CountryId}'>${country.CountryName}</option>`
            })
            obj.html(results)
        }).fail(function(response, status, error){

            filterCityNotifications.html(`
                <div class="alert alert-danger alert-sm" > ${response.responseText}</div>`
            )

        })
    }

    //save city

    saveCityBtn.on('click', function(){

        cityid = cityIdField.val(),
        countryid = cityCountryList.val(),
        cityname = cityNameField.val()

        //check for blank fields
        if(countryid == '' || countryid == null){

            cityDetailNotifications.html('<div class="alert alert-info">Please select a country<div>')
            cityCountryList.focus()
        }else if(cityname == "" || cityname == null){
            cityDetailNotifications.html('<div class="alert alert-info">Please enter city name<div>')
            cityNameField.focus()
        }else{
            $.post(
                "Controllers/cityoperations.php",
                {
                    saveCity:true,
                    CityId:cityid,
                    CityName:cityname,
                    CountryId:countryid

                },
                function(data){

                    if(isJSON(data)){

                        data = JSON.parse(data)

                        if(data.status == "success"){

                            cityDetailNotifications.html(`<div class="alert alert-success ">City Name Saved Successfully <div>`)
                            cityNameField.val('').focus()

                        }else if(data.status == "exists"){

                            cityDetailNotifications.html(`<div class="alert alert-info "> The City Name Already Exists<div>`)
                            cityNameField.focus()

                        }else{

                            cityDetailNotifications.html(`<div class="alert alert-danger ">Sorry an error occured ${data} <div>`)

                        }
                    }//if it is a JSON it displays the message in the php file 
                    else{

                    }//If it wasn't a JSON we tell the user their was an error

                }
            )
        }
    })

    closeCityDetailsModalBtn.on('click', function(){

        cityDetailsModal.modal('hide')
    })

    function isJSON(str){
        try{

            return(JSON.parse(str) && !!str)

        } catch (e){

            return false

        }
    }

    //search cities button click
    searchCitiesBtn.on('click', function(){

        getCitiesAsTable()

    })
    
    function getCitiesAsTable(){
        CountryName = filterCountryList.val(),
        CityName = filterCityName.val()
        $.getJSON(
            "Controllers/cityoperations.php",
            {
                filterCity:true,
                CountryName,
                CityName
            }   
        ).done(function(data){
            let results = "";
            data.forEach(function(city, i){
                results += `<tr> <td> ${i+1} </td>`
                results += `<td> ${city.CountryName} </td>`
                results += `<td> ${city.CityName} </td>`
                results += `<td> ${city.airports} </td>`
                results += `<td> ${city.airlines} </td>`
                results += `<td> <a href='#'> <i class ='fas fa-edit fa-lg'> </i> </a> </td> </tr>`
            })

            //insert results into the table body
            cityTable.find('tbody').html(results);

            
        }).fail(function(response, status, error){

            console.log(`sorry an error occured ${response.responseText}`);
            filterCityNotifications.html(`<div class='alert alert-danger' role='alert'> An error occured ${response.responseText} </div>`)
        })
    }

 
})