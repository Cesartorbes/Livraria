# Livraria

<form method="post" name="registration" action="">
                                                <div class="form-floating mb-3">
                                                    <label for="nomelivro">Nome do livro:</label>
                                                    <input type="hidden" value="3" name="registro" id="registro">
                                                    <input class="form-control" id="nomelivro" type="text" name="nomelivro"
                                                        placeholder="Insira o nome do livro" required />
                                                </div>
                                                <div class="form-floating mb-3">
                                                <label for="categoria">Categoria:</label>
                                                <select name="categoria">
                                                    <option value="suspense">Suspense</option>
                                                    <option value="romance" selected>Romance</option>
                                                    <option value="infantil">Infantil</option>
                                                    <option value="historia">Historia</option>
                                                    <option value="fantasia">Fantasia</option>
                                                    <option value="ciencia">Ciência</option>
                                                    <option value="biografia">Biografia</option>
                                                    <option value="aventura">Aventura</option>
                                                    <option value="autobiografia">Autobiografia</option>
                                                </select>
                                                 <div class="form-floating mb-3">
                                                    <label for="preco">Autor:</label>
                                                 <input class="form-control" id="autor" type="text" name="autor"
                                                     placeholder="Insira o nome do autor" />
                                             </div>       
                                                <div class="mt-4 mb-0">
                                                    <div class="d-grid">
                                                        <button type="submit" name="submit" class="btn btn-primary btn-block">Inserir livro</button></div>
                                                </div>
                                            </form>