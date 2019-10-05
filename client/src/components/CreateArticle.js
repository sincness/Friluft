import React, { Component } from 'react'
import './css/CreateArticle.css';


class CreateArticle extends Component {


    constructor(props) {
        super(props);
        this.state = {
            file: '',
            imagePreviewUrl: ''
        };
        this._handleImageChange = this._handleImageChange.bind(this);
        this._handleSubmit = this._handleSubmit.bind(this);
    }

    _handleSubmit(e) {
        e.preventDefault();
        // TODO: do something with -> this.state.file
    }

    _handleImageChange(e) {
        e.preventDefault();

        let reader = new FileReader();
        let file = e.target.files[0];

        reader.onloadend = () => {
            this.setState({
                file: file,
                imagePreviewUrl: reader.result
            });
        }

        reader.readAsDataURL(file)
    }
    render() {
        console.log(this.state.file);

        let { imagePreviewUrl } = this.state;
        let $imagePreview = null;
        if (imagePreviewUrl) {
            $imagePreview = (<img className="uploadedImage" src={imagePreviewUrl} alt="uploaded" />);
        }
        return (
            <section className="create">
                <h3 className="create__trin">Trin 1/3</h3>
                <form action="">
                    <article className="create__01">
                        <div className="create__article-info">
                            <h2>Annoncens information</h2>
                            <label htmlFor="header">Overskrift</label>
                            <input type="text" name="header" id="header" className="create__header" placeholder="Navnet på dit produkt" />
                            <label htmlFor="kategori">kategori</label>
                            <select name="kategori" id="kategori" className="create__category">
                                <option value="noSelect" defaultValue>-Vælg-</option>
                                <option value="noSelect">Jagt</option>
                                <option value="noSelect">Fiskeri</option>
                                <option value="noSelect">Frilufts liv</option>
                                <option value="noSelect">Andet</option>
                            </select>
                            <label htmlFor="desc">Beskrivelse</label>
                            <textarea name="desc" id="header" className="create__Desc" placeholder="Beskrev dit produkt"></textarea>
                            <label htmlFor="price">Pris</label>
                            <input type="text" name="price" id="price" className="create__price" placeholder="0" />
                        </div>
                        <div className="create__image">
                            <label htmlFor="imageFile" className="create__file-btn">Tilføj billede(r)</label>
                            <input multiple onChange={this._handleImageChange} name="imageFile" id="imageFile" type="file" />
                            {/* <img className="uploadedImage" src={this.state.file} alt="uploaded images" /> */}
                            {$imagePreview}

                        </div>
                        <div className="create__button">
                            <button type="button">Næste Trin</button>
                        </div>
                    </article>
                </form>
            </section>
        )
    }
}

export default CreateArticle
