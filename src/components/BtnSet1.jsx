// BtnSet1.js
import React, { useState, useEffect } from 'react';
import axios from 'axios';

import Form1 from './Form1';
import Form2 from './Form2';
import Form3 from './Form3';
import Form4 from './Form4';


const BtnSet1 = ({ values, isRequired, btnNumber, columns, onChange, onCheckboxChange, name, proper }) => {
  
  const [showTable, setShowTable] = useState(false); 
  const [tableData, setTableData] = useState([]); 

  useEffect(() => {
    fetchData(); 
  }, [name]);  

  const toggleTable = () => {
    setShowTable(!showTable); 
  };

  const fetchData = () => {
    
    axios.get(`http://localhost/test/Revision/add_revision_readtables.php?tablename=${name}`)
      .then(response => {
        setTableData(response.data); 
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  };

  let FormComponent;

  switch (btnNumber) {
    case 1:
      FormComponent = Form1;
      break;
    case 2:
      FormComponent = Form2;
      break;
    case 3:
      FormComponent = Form3;
      break;
    case 4:
      FormComponent = Form4;
      break;
    default:
      FormComponent = Form1; // Default to Form1
  }

  return (
    <div>      
      <div className="table-wrapper">
      <div className='name_and_btn'>
        <h3>{proper}</h3>
        <button className="toggle-button" onClick={toggleTable}>{showTable ? '-' : '+'}</button>
      </div>
      {showTable && (
      <>
        <div className='form-div'>
        <FormComponent
        values={values}
        isRequired={isRequired}
        onChange={onChange}
        onCheckboxChange={onCheckboxChange}
        />
        </div>
        <div className="table-container">
          <table className="data-table">
            <thead>
              <tr>
                {columns.map((column, index) => (
                  <th key={index}>{column}</th>
                ))}
              </tr>
            </thead>
            <tbody>
              {tableData.map((row, index) => (
                <tr key={index}>
                  {Object.values(row).map((value, index) => (
                    <td key={index}>{value}</td>
                  ))}
                </tr>
              ))}
            </tbody>
          </table>
          </div>
        </>
      )}
      </div>
    </div>
  );
};

export default BtnSet1;
