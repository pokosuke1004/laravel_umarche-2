<x-tests.app>
  <x-slot name="header">こちらはもう一つのslot,headerの方です.中身は変えています</x-slot>
  コンポーネントテスト２
  <x-tests.card title="タイトル2"/>
  <x-test-class-base classBaseMessage="クラスベース" />
  <div class="mb-4"></div>
  <x-test-class-base classBaseMessage="クラスベース" defaultMessage="初期値から変更しています"/>
</x-tests.app>