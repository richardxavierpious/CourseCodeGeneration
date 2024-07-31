import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Home from './pages/Home';
import Revision from './pages/Revision';
import CodeGen from './pages/CodeGen';
import SC_SD from './pages/Generation/SC_SD';
import SC_taught_by_MD from './pages/Generation/SC_taught_by_MD';
import SC_offered_to_MD from './pages/Generation/SC_offered_to_MD';
import SC_in_different_sem from './pages/Generation/SC_in_different_sem';
import Update from './pages/Update';

function App() {
  return (
    <Router>
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/revision" element={<Revision />} />
        <Route path="/update" element={<Update />} />
        <Route path="/code-gen" element={<CodeGen />} />
        <Route path="/code-gen/page1" element={<SC_SD />} />
        <Route path="/code-gen/page2" element={<SC_taught_by_MD />} />
        <Route path="/code-gen/page3" element={<SC_offered_to_MD />} />
        <Route path="/code-gen/page4" element={<SC_in_different_sem />} />
      </Routes>
    </Router>
  );
}

export default App;
