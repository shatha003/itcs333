const url="https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100"

async function fetchUOBData(){
    try{
        const response= await fetch(url)
        if(!response.ok || response.status !=200){

            console.error('not ok')
          
        }

       console.log('response=', response);
       
         console.log(data);
       

    }
    catch(error){
        console.error('error occured', error); 
    }
}
