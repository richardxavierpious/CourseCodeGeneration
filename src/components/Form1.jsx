import React from 'react';

const Form1 = ({ values, onChange, isRequired, onCheckboxChange }) => {
  return (
    <div>
      <label>Degree Code:  </label>
      <input
        type="text"
        value={values[0]}
        onChange={(e) => onChange(e.target.value, 0)}
        required={isRequired && values[0].trim() === ""} // Required if checkbox is ticked and value is empty
      />
      <label>Degree exp:  </label>
      <input
        type="text"
        value={values[1]}
        onChange={(e) => onChange(e.target.value, 1)}
        required={isRequired && values[1].trim() === ""} // Required if checkbox is ticked and value is empty
      />
      <label>Degree short:  </label>
      <input
        type="text"
        value={values[2]}
        onChange={(e) => onChange(e.target.value, 2)}
        required={isRequired && values[2].trim() === ""} // Required if checkbox is ticked and value is empty
      />
      <label>
        <input
          className='check1'
          type="checkbox"
          checked={isRequired}
          onChange={onCheckboxChange}
        />
        Required
      </label>
    </div>
  );
};

export default Form1;
