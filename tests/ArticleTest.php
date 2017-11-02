<?php
use App\Article;
use Illuminate\Foundation\Testing\WithoutMiddleware;
/**
 * summary
 */
class ArticleTest extends TestCase
{
    /**
     * summary
     */
    public function testArticleIndex()
    {
    	$this->call('GET', 'articles');
    	$this->assertResponseOk();
    	$this->assertViewHas('articles');
    }

    public function testArticleCreate()
    {
    	$this->call('GET', 'articles/create');
    	$this->assertResponseOk();
    }

    public function testArticleStoreFails()
    {
    	$data = array("title" => "", "content" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "writer" => "Ujang");
    	$post = $this->action('POST', 'ArticlesController@store', $data);
    }

    public function testArticleStoreSuccess()
    {
    	$data = array("title" => "Testing Article title ".str_random(10),"content" => str_random(10)." Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "writer" => "Ujang");
    	$post = $this->action('POST', 'ArticlesController@store', $data);
    	$this->assertResponseStatus(302);
    	$this->assertRedirectedToRoute('articles.index');
    }

    public function testArticleShow()
    {
    	$article = Article::where('title', 'like', '%Testing Article title%')->first();
    	if (empty($article)) {
    		$data = array("title" => "Testing Article title", "content" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "writer" => "Ujang");
    		$post = $this->action('POST', 'ArticlesController@store', $data);
    	}

    	$this->action('GET', 'ArticlesController@show', $article['id']);
		$this->assertResponseOk();
    }

    public function testArticleEdit()
    {
    	$article = Article::where('title', 'like', '%Testing Article title%')->first();
    	if (empty($article)) {
    		$data = array("title" => "Testing Article title", "content" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "writer" => "Ujang");
    		$post = $this->action('POST', 'ArticlesController@store', $data);
    	}

    	$this->action('GET', 'ArticlesController@edit', $article['id']);
		$this->assertResponseOk();
    }

    public function testArticleUpdateFails()
    {
    	$data = array("title" => "Testing Article title", "content" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "author" => "Ujang");
    	$post = $this->action('POST', 'ArticlesController@store', $data);

    	$article = Article::where('title', 'like', '%Testing Article title%')->first();
    	$update_data = array("title" => "", "content" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "writer" => "Ujang");
    	$this->call('PUT', 'articles/'.$article['id'], $update_data);
    }

    public function testArticleUpdateSuccess()
    {
 		$article = Article::where('title', 'like', 'Testing Article title')->first();  	
    	if (empty($article)) {
    		$data = array("title" => "Testing Article title", "content" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "writer" => "Ujang");
    		$post = $this->action('POST', 'ArticlesController@store', $data);
    	}
    	$update_data = array("title" => "Edit Article Testing ".str_random(10), "content" => str_random(10)."Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "writer" => "Ujang");
    	$this->call('PUT', 'articles/'.$article['id'], $update_data);
    }
}