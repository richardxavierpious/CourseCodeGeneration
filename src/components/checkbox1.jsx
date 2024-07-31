import React, { useState } from 'react';

export default function Checkbox(){
    const [showcheckbox,setshowcheckbox] = useState(false);

    function Handleclick(){
        setshowcheckbox(!showcheckbox);
    }  
    
    let check = null;    
    if(showcheckbox){
        check=<div>
            <div>
            <label>
                <input type="checkbox" name="IT"/>
                IT
            </label>
            </div>
            <div>
            <label>
                <input type="checkbox" name="CS"/>
                CS
            </label>
            </div>
            <div>
            <label>
                <input type="checkbox" name="AIDS"/>
                AIDS
            </label>
            </div>
            <div>
            <label>
                <input type="checkbox" name="CSBS"/>
                CSBS
            </label>
            </div>
        </div>                
    }
    return(
        <>
            <h2>Departments involved in new revision:</h2>
            <button onClick={Handleclick}>{showcheckbox ? "-" : "+"}</button>
            {check}
        </>
    )
}
