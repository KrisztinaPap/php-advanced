const reactRoot = document.getElementById('react-root');

const SearchForm = props => {

    const [search, setSearch] = React.useState( '' );

    const submitSearch = event => {
        event.preventDefault();
        fetch( `http://localhost:80/api/snacks.php?search=${search}` )
            .then( response => response.json() )
            .then( data => {
                console.log(data);
            } )
    }

    return (
        <React.Fragment>
            <h2>Snack Search Form</h2>
            <form onSubmit={submitSearch}>
                <label htmlFor="search">
                    Enter a Search Term:
                    <input 
                        type="search"
                        id="search" 
                        onChange={event => { setSearch( event.target.value ) } }
                        value={search} />
                </label>
                <input 
                    type="submit"
                    value="Search Snacks" />
            </form>
            <h3>Snack Search Results</h3>
            <ul></ul>
        </React.Fragment>
    )
}


ReactDOM.render( <SearchForm />, reactRoot );