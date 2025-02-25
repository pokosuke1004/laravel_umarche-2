<x-tests.app>
  <x-slot name="header">こちらはもう一つのslot,headerの方です</x-slot>
  コンポーネントテスト１

  <x-tests.card title="タイトル1" content="内容です1" :message="$message"/>
  <x-tests.card title="タイトル2" content="あ"/>
  <x-tests.card title="ここだけcssを変更したい" class="bg-red-300"/>


</x-tests.app>
