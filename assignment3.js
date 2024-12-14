const url =
  "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";

// function to fetch data from the API
async function fetchUOBData() {
  try {
    // get the data from the API
    const response = await fetch(url);

    // check if the response is successful and stop if the response is successful
    if (!response.ok || response.status != 200) {
      console.error("Error: Response not okay");
      return; 
    }

    // convert the response to JSON format
    const data = await response.json();
    console.log("Response data:", data); 

    // extract the records from the data
    const results = data.records;

    // pass the records to the function that displays them
    displayUobData(results);
  } catch (error) {
    // show an error message if something goes wrong
    console.error("Error occurred:", error);
  }
}
function displayUobData (results){
    const tableBody = document.getElementById('table-body')
    results.forEach(result => { 
        console.log(result); 
        const tablerow = document.createElement('tr')
        tableRow.innerHTML= `
        <td>${result.colleges}</td>
        <td>${result.colleges}</td>
        `
        tableBody.appendChild(tableRow)

    }); 
        
    }

document.addEventListener('DOMContentLoaded', fetchUOBData)
