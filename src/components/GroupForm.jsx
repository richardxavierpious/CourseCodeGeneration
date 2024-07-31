// GroupForm.js
import React, { useState } from 'react';
import axios from 'axios';
import BtnSet1 from './BtnSet1';

const GroupForm = () => {
  const [formStates, setFormStates] = useState([
    { tableName: 'degree', values: ['', '', ''], isRequired: true, btnNumber: 1, columns: ["Degree Code", "Degree Exp", "Degree short"], proper_name : "Add New Degree" },
    { tableName: 'dept', values: ['', '', ''], isRequired: true, btnNumber: 2, columns: ["Department ID", "Department Name", "Department Short"], proper_name : "Add New Department" },
    { tableName: 'programme', values: ['', '', '', '', '', ''], isRequired: true, btnNumber: 3, columns: ["Programme ID", "Programme Name", "Programme short", "Department ID", "Code", "Degree ID"], proper_name : "Add New Program" },
    { tableName: 'coursetype', values: ['', '', '', '', '', '', ''], isRequired: true, btnNumber: 4, columns: ["CrsTypeId", "Course Type ID", "Course Type","Work Load","Effective Date","Description","Course Type Name"], proper_name : "Add New Course Type" },
  ]);

  const handleInputChange = (index, value, inputIndex) => {
    const newFormStates = [...formStates];
    newFormStates[index].values[inputIndex] = value;
    setFormStates(newFormStates);
  };

  const handleCheckboxChange = (index) => {
    const newFormStates = [...formStates];
    newFormStates[index].isRequired = !newFormStates[index].isRequired;
    setFormStates(newFormStates);
  };

  const handleFormSubmit = (e) => {
    

    const isValidSubmission = formStates.every(({ values, isRequired }) => {
      return !isRequired || (values.every(val => val.trim() !== ""));
    });

    if (!isValidSubmission) {
      alert("Please fill in all required fields.");
      return;
    } 
    
    const formData = formStates.map(({ tableName, values, columns }) => {
      // Create an object to hold the form data for the current table
      const tableData = {};
      
      // Iterate over the columns and add the corresponding value from the form
      columns.forEach((column, index) => {
        tableData[column] = values[index];
      });
    
      // Return the table data object
      return tableData;
    });
    

    axios.post('http://localhost/test/Revision/write_into_table.php', formData)
      .then(response => {
        console.log(response);
        window.location.reload();
      })
      .catch(error => {
        console.error(error);
      });
  };

  return (
    <div>
      {formStates.map(({ values, isRequired, btnNumber, columns, tableName, proper_name}, index) => (
        <BtnSet1
          key={index}
          values={values}
          isRequired={isRequired}
          btnNumber={btnNumber}
          columns={columns}
          name={tableName} // Pass the columns prop
          onChange={(value, inputIndex) => handleInputChange(index, value, inputIndex)}
          onCheckboxChange={() => handleCheckboxChange(index)}
          proper = {proper_name}       
        />
      ))}
      <center><button type="submit" className='home-button' id='submit1' onClick={handleFormSubmit}>Submit</button></center>
    </div>
  );
};

export default GroupForm;
