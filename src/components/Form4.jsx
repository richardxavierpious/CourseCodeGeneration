import React from 'react';

const Form4 = ({ values, onChange, isRequired, onCheckboxChange }) => {
  return (
    <div>
      
        <label id='crs'>CrsTypeId:</label>
        <input
          type="text"
          value={values[0]}
          onChange={(e) => onChange(e.target.value, 0)}
          required={isRequired && values[0].trim() === ""}
        />
      
      
        <label>Course Type ID:</label>
        <input
          type="text"
          value={values[1]}
          onChange={(e) => onChange(e.target.value, 1)}
          required={isRequired && values[1].trim() === ""}
        />
      
      
        <label>Course Type:</label>
        <input
          type="text"
          value={values[2]}
          onChange={(e) => onChange(e.target.value, 2)}
          required={isRequired && values[2].trim() === ""}
        />
      
      
        <label>Work Load:</label>
        <input
          type="text"
          value={values[3]}
          onChange={(e) => onChange(e.target.value, 3)}
          required={isRequired && values[3].trim() === ""}
        />
      
      
        <label>Effective Date:</label>
        <input
          type="text"
          value={values[4]}
          onChange={(e) => onChange(e.target.value, 4)}
          required={isRequired && values[4].trim() === ""}
        />
      
      
        <label>Description:</label>
        <input
          type="text"
          value={values[5]}
          onChange={(e) => onChange(e.target.value, 5)}
          required={isRequired && values[5].trim() === ""}
        />
      
      
        <label>Course Type Name:</label>
        <input
          type="text"
          value={values[6]}
          onChange={(e) => onChange(e.target.value, 6)}
          required={isRequired && values[6].trim() === ""}
        />
     
      
        <label>
          <input
            className='check2'
            type="checkbox"
            checked={isRequired}
            onChange={onCheckboxChange}
          />
          Required
        </label>
      
    </div>
  );
};

export default Form4;