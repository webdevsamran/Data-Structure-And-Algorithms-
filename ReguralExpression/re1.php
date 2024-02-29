<input type="text" name="username" placeholder="username"><br/>
<span id="username_err">Username must be alphanumeric and contain 6 - 12 characters</span><br/>
<input type="email" name="email" placeholder="email"><br/>
<span id="email_err">Enter valid email like me@mydomain.com</span><br/>
<input type="password" name="password" placeholder="password"><br/>
<span id="password_err">Password must be alphanumeric and (@,_ and -) are allowed and must be 8 - 20 characters long</span><br/>
<input type="tel" name="telephone" placeholder="Phone Number"><br/>
<span id="telephone_err">Telephone must be valid 11 digits number</span><br/>
<input type="text" name="slug" placeholder="Profile Slug"><br/>
<span id="slug_err">Slugs must contain only lowercases letters, numbers, hyphens and must be 8 - 20 characters long</span><br/>

<script>
    const pattern = {
        telephone: /^[0-9]{11}$/,
        username: /^[a-z0-9]{6,12}$/i,
        password: /^[@-\w]{8,20}$/i,
        slug: /^[a-z0-9-]{8,20}$/,
        email: /^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/
    }
    const inputs = document.querySelectorAll('input');
    inputs.forEach((input) => {
        input.addEventListener('keyup', (e) => {
            // console.log(e.target.attributes.name.value)
            let result = validate(e.target,pattern[e.target.attributes.name.value])
            if(result){
                document.getElementById(`${e.target.attributes.name.value}_err`).style.color = 'green';
            }else{
                document.getElementById(`${e.target.attributes.name.value}_err`).style.color = 'red';

            }
        })
    })
    const validate = (field, regex) => {
        return regex.test(field.value);
    }
</script>