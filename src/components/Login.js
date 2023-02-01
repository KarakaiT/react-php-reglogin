import { useState } from "react";
import { useNavigate } from "react-router-dom"
import axios from "axios";


const Login = ()=> {

    let navigate = useNavigate();

    const [user, setUser] = useState({email:'', password:'',})

    const handleChange=(e)=>{

        setUser({...user, [e.target.name]: e.target.value});
    }

    const submitForm =(e)=>{
        e.preventDefault();
        const sendData = {
            email:user.email,
            password:user.password
        }

        //console.log(sendData);


        axios.post('http://localhost:80/reglogin-react/login.php', sendData).then((result) => {

            if(result.data){
                //window.localStorage.setItem('Email', result.data.Email);
                //window.localStorage.setItem('Name', (result.data.first_name+' '+ result.data.last_name)); Megkérdezni Atitól!
                navigate(`/dashboard`);
            }
            else {

                //props.history.push('/Dashboard')
                //props.history.push('/Dashboard') Redirect
                alert('Invalid User');
            }
       
            
        })
    }

    return(

        <form onSubmit={submitForm}>
            <div className="main-box">
                <div className="row">
                    <div className="col-md-12 text-center">
                        <h1> Login Page</h1>
                    </div>
                </div>
                <div className="row">
                    <div className="col-md-6">Email:</div>
                    <div className="col-md-6"><input type="email" name="email" className="form-control" onChange={handleChange} value={user.email} /></div>
                </div>
                <div className="row">
                    <div className="col-md-6">Password:</div>
                    <div className="col-md-6">
                        <input type="password" name="password"  className="form-control" onChange={handleChange} value={user.password} />
                    </div>
                </div>


                <div className="row">
                    <div className="col-md-12 text-cener">
                        <input type="submit" name="submit" value="Please Login" className="btn btn-success" />
                    </div>
                </div>
            </div>
        </form>
    )
}

export default Login;