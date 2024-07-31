import React from 'react';
import { Link } from 'react-router-dom';

const CodeGen = () => {
  return (
    <div className="home-container">
      <div className='btn_heading'>
        <Link to="/"><button className='home-button'>Go back to Home Page</button></Link>
        <center><h1 className='gen_h1'>Code Generation Page</h1></center>
      </div>
      <div className="button-container">        
        <Link to="/code-gen/page1"><button className="home-button">Single Course - Single Department</button></Link>
        <Link to="/code-gen/page2"><button className="home-button">Single Course - Taught by Multiple Department</button></Link>
        <Link to="/code-gen/page3"><button className="home-button">Single Course - Offered to Multiple Department</button></Link>
        <Link to="/code-gen/page4"><button className="home-button">Single Course - Taught in multiple semesters</button></Link>
      </div>
    </div>
  );
};

export default CodeGen;
