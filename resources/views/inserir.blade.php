<form action= "insert" method="post"> 
        {{ csrf_field() }}
        <input type="text" name="mes">
        <input type="text" name="ano">
        <input type="text" name="valor">
        <button>enviar</button>
    </form>