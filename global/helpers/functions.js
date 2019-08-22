function isJSONString(string)
{
    try {
        if (string != "[]") {
            JSON.parse(string);
            return true;
        } else {
            return false;
        }
    } catch(error) {
        return false;
    }
}

function arrayRemove(arr, index) {

    var value = arr.indexOf(index);
 
    if (value > -1) {
        arr.splice(value, 1);
        return true;
    }
    else{
        return false;
    }

 
 }
 
 