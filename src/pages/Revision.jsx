import React from 'react';
import { Link } from 'react-router-dom';
import GroupForm from '../components/GroupForm';

const Revision = () => {
  return (
    <div>
      <center><h1>Revision</h1></center>      
      <Link to="/"><button className='home-button'>Go back to Home Page</button></Link>
      <GroupForm />
    </div>
  );
};

export default Revision;
