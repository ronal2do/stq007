<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class PessoasController extends CrudController{

     public function all($entity){
        parent::all($entity); 

        

			$this->filter = \DataFilter::source(new \App\Pessoas);
			$this->filter->add('nome', 'Nome', 'text');
			$this->filter->add('id_grupo', 'Grupo', 'text');
			$this->filter->add('id_programa', 'Programa', 'text');
			$this->filter->submit('buscar');
			$this->filter->reset('resetar');
			$this->filter->build();

			$this->grid = \DataGrid::source($this->filter);
			$this->grid->add('nome', 'Nome');
			$this->grid->add('sexo', 'Sexo');
			$this->grid->add('nascimento', 'Nascimento');
			$this->grid->add('responsavel', 'Responsável');
			$this->grid->add('email', 'Email');
			$this->grid->add('tel-fixo', 'Telefone Fixo');
			$this->grid->add('rua', 'Logradouro');
			$this->grid->add('numero', 'Número');
			$this->grid->add('bairro', 'Bairro');
			$this->grid->add('id_grupo', 'Grupo');
			$this->grid->add('id_programa', 'Programa');
			$this->addStylesToGrid();
    
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

			$this->edit = \DataEdit::source(new \App\Pessoas());

			$this->edit->label('Mailling');

			$this->edit->add('nome', 'Nome','text' );
			$this->edit->add('sexo', 'Sexo', 'radiogroup')->option('F', 'Feminino')->option('M', 'Masculino');
			$this->edit->add('nascimento', 'Nascimento','date')->placeholder('dd/mm/aaaa')->format('d/m/Y', 'pt-BR');
			$this->edit->add('responsavel', 'Responsável','text');
			$this->edit->add('email', 'Email','text');
			$this->edit->add('tel-fixo', 'Telefone Fixo','text');
			$this->edit->add('tel-celular', 'Telefone Celular','text');
			$this->edit->add('rua', 'Logradouro','text');
			$this->edit->add('numero', 'Número','text');
			$this->edit->add('complemento', 'Complemento','text');
			$this->edit->add('bairro', 'Bairro','text');
			$this->edit->add('cidade', 'Cidade','text');
			$this->edit->add('estado', 'Estado','text');
			$this->edit->add('id_grupo', 'Grupo', 'select')->options(\App\Grupos::lists("nome","id")->all());
			$this->edit->add('id_programa', 'Programa', 'select')->options(\App\Programas::lists("nome","id")->all());

        return $this->returnEditView();
    } 
}
