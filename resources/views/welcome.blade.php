store
<form action='/gallery' method='post' enctype='multipart/form-data'>
    @csrf
    <input name='en[title]' value='title en' />
    <input name='tr[title]' value='title en' />
    <input type='file' name='image' />
    <button type='submit'>Submit</button>
</form>

<form action='/gallery/35' method='post' enctype='multipart/form-data'>
    @csrf
    <input name='en[title]' value='title en' />
    <input name='tr[title]' value='title en' />
    <input type='file' name='image' />
    <button type='submit'>Submit</button>
</form>
