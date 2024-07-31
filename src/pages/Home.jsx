import React from 'react';
import { Link } from 'react-router-dom';


const Home = () => {
  return (
    <div className="home-container">
      <h1 className="home-title">Home Page</h1>
      <div className="button-container">
        <Link to="/revision" className="button-link">
          <button className="home-button">Go to New Revision Page</button>
        </Link>
        <Link to="/update" className="button-link">
          <button className="home-button">Go to Update Revision Page</button>
        </Link>
        <Link to="/code-gen" className="button-link">
          <button className="home-button">Go to Course Code Generation Page</button>
        </Link>
      </div>
    </div>
  );
};
export default Home;

