const reactRoot = document.getElementById('react-root');

const SearchForm = props => {

    const [search, setSearch] = React.useState( '' );

    return (
        <React.Fragment>
            <h2>Snack Search Form</h2>
            <form>
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