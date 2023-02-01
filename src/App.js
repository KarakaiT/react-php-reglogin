import './App.css';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Header from './components/Header';
import Home from './components/Home';
import Login from './components/Login';
import Register from './components/Register';
import Dashboard from './components/Dashboard';


function App() {
  return (
    <div>
      <Router>
        <Header/>
          <Routes>
            <Route path="/" element={<Home/>}/>
            <Route path="/login" element={<Login/>}/>
            <Route path="/Register" element={<Register/>}/>
            <Route path="/dashboard" element={<Dashboard/>}/>
          </Routes>
      </Router>
    </div>

  );
}

export default App;
