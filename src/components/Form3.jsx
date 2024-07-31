import React from 'react';

const Form3 = ({ values, onChange, isRequired, onCheckboxChange }) => {
  return (
    <div>
      <label>Programme ID: </label>
      <input
        type="text"
        value={values[0]}
        onChange={(e) => onChange(e.target.value, 0)}
        required={isRequired && values[0].trim() === ""}
      />
      <label>Programme Name: </label>
      <input
        type="text"
        value={values[1]}
        onChange={(e) => onChange(e.target.value, 1)}
        required={isRequired && values[1].trim() === ""}
      />
      <label>Programme Short:  </label>
      <input
        type="text"
        value={values[2]}
        onChange={(e) => onChange(e.target.value, 2)}
        required={isRequired && values[2].trim() === ""}
      />
      <label>Department ID:  </label>
      <input
        type="text"
        value={values[3]}
        onChange={(e) => onChange(e.target.value, 3)}
        required={isRequired && values[3].trim() === ""}
      />
      <label>Code: </label>
      <input
        type="text"
        value={values[4]}
        onChange={(e) => onChange(e.target.value, 4)}
        required={isRequired && values[4].trim() === ""}
      />
      <label>Degree ID:  </label>
      <input
        type="text"
        value={values[5]}
        onChange={(e) => onChange(e.target.value, 5)}
        required={isRequired && values[5].trim() === ""}
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

export default Form3;
