import React from 'react';
import { Link } from 'react-router-dom';
import GroupForm1 from '../components/GroupForm1';

const Update = () => {
  return (
    <div>
      <center><h1>Update Current Revision</h1></center>
      <Link to="/"><button className='home-button'>Go back to Home Page</button></Link>
      <GroupForm1 />
    </div>
  );
};

export default Update;